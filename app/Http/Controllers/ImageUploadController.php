<?php

namespace App\Http\Controllers;

use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public static function upload($file, $folder, $publicId)
    {
        $upload = new UploadApi();
        
        if (!$file->isValid()) {
            throw new \Exception("El archivo no es válido.");
        }
    
        $filePath = $file->store('temp_uploads', 'local');
        $absolutePath = storage_path('app/' . $filePath);
    
        $uploadResponse = $upload->upload($absolutePath, [
            'folder'      => $folder,
            'public_id' => $publicId,
            'use_filename' => true,
            'overwrite' => true
        ]);
    
        // El campo 'secure_url' contiene la URL segura
        $profilePicture = $uploadResponse['secure_url'];
    
        // Elimina el archivo temporal
        Storage::delete($filePath);
    
        if (!$profilePicture) {
            throw new \Exception("Error al subir la imagen a Cloudinary.");
        }
        
        return $profilePicture;
    }
    
}
