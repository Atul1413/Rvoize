<?php

namespace Modules\Media\Traits;

use App\Rules\FileExtRule;
use App\Rules\ImageSizeRule;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Modules\Media\Helpers\FileHelper;
use Modules\Media\Models\MediaFile;

trait HasUpload
{

    public function uploadFile(Request $request,$fileName = 'file',$fileType = 'image')
    {
        $this->validateFile($request,$fileType,$fileName);

        $file = $request->file($fileName);

        return $this->uploadSingleFile($file);

    }

    public function uploadSingleFile(UploadedFile $file)
    {
        $folder = '';
        $id = Auth::id();
        if ($id) {
            $folder .= sprintf('%04d', (int)$id / 1000) . '/' . $id . '/';
        }
        $folder = $folder . date('Y/m/d');
        $newFileName = Str::slug(substr($file->getClientOriginalName(), 0, strrpos($file->getClientOriginalName(), '.')));
        if(empty($newFileName)) $newFileName = md5($file->getClientOriginalName());

        $i = 0;
        do {
            $newFileName2 = $newFileName . ($i ? $i : '');
            $testPath = $folder . '/' . $newFileName2 . '.' . $file->getClientOriginalExtension();
            $i++;
        } while (Storage::disk('uploads')->exists($testPath));

        $check = $file->storeAs( $folder, $newFileName2 . '.' . $file->getClientOriginalExtension(),'uploads');

        if ($check) {
            try {
                $fileObj = new MediaFile();
                $fileObj->file_name = $newFileName2;
                $fileObj->file_path = $check;
                $fileObj->file_size = $file->getSize();
                $fileObj->file_type = $file->getMimeType();
                $fileObj->file_extension = $file->getClientOriginalExtension();
                if (FileHelper::checkMimeIsImage($file->getMimeType())) {
                    list($width, $height, $type, $attr) = getimagesize(public_path("uploads/".$check));
                    $fileObj->file_width = $width;
                    $fileObj->file_height = $height;
                }
                $fileObj->save();
                // Sizes use for uploaderAdapter:
                // https://ckeditor.com/docs/ckeditor5/latest/framework/guides/deep-dive/upload-adapter.html#the-anatomy-of-the-adapter
                $fileObj->sizes = [
                    'default' => asset('uploads/' . $fileObj->file_path),
                    '150'     => url('media/preview/'.$fileObj->id .'/thumb'),
                    '600'     => url('media/preview/'.$fileObj->id .'/medium'),
                    '1024'    => url('media/preview/'.$fileObj->id .'/large'),
                ];
                return $fileObj;

            } catch (\Exception $exception) {
                Storage::disk('uploads')->delete($check);
                throw $exception;
            }
        }
        throw new \Exception(__("Can not upload file"));
    }

    public function validateFile(Request $request, $group = "default",$fileName = 'file',$isArray = false)
    {

        $uploadConfigs = config('bc.media.groups');
        $config = isset($uploadConfigs[$group]) ? $uploadConfigs[$group] : $uploadConfigs['default'];

        $rule = ['required','file'];
        if(!empty($config['ext'])){
            $rule[] = 'mimes:'.implode(',',$config['ext']);
            $rule[] = new FileExtRule($config['ext']);
        }
        if(!empty($config['mime'])){
            $rule[] = 'mimetypes:'.implode(',',$config['mime']);
        }
        if(!empty($config['max_size'])){
            $rule[] = 'max:'.round($config['max_size']/1024);
        }
        if (!empty($config['max_width']) or !empty($config['max_height'])) {
            $rule[] = new ImageSizeRule($config['max_width'] ?? '',$config['max_height'] ?? '');
        }

        $nameForValidate = $isArray ? $fileName.'.*' : $fileName;

        $validator = Validator::make($request->all(),[
            $nameForValidate =>$rule
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            throw new \Exception($errors->first($fileName));
        }

        return true;
    }
}
