<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\File;
class UploadPptFiles extends Command
{
    protected $signature = 'upload:ppt-files {folder?}';
    protected $description = 'Upload all PPT files in a folder to the database';
    public function handle(File $file)
    {
        $folder = $this->argument('folder') ?? 'ppt-files';
        $files = Storage::allFiles($folder);

        foreach ($files as $filePath) {
            $fileName = basename($filePath);
            if (pathinfo($fileName, PATHINFO_EXTENSION) === 'ppt' || pathinfo($fileName, PATHINFO_EXTENSION) === 'pptx') {
                $fileContents = file_get_contents($filePath);
                $fileModel = new File();
                $fileModel->name = $fileName;
                $fileModel->file_contents = $fileContents;
                $fileModel->save();
            }
        }

        $this->info('All PPT files in the folder have been uploaded to the database.');
    }
}