<?php
/**
 *
 */
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CommonHelper {
  public static function serveAdminAssets($fileName, $filePath) {

    if( Auth::check() ) {
      $adminAssetsBasePath = public_path().'/admin_assets';

      $source = $adminAssetsBasePath.$filePath.$fileName;

      $destDir = 'public/'.Auth::user()->id.$filePath;

      $dest = $destDir.$fileName;

      Storage::put($dest, file_get_contents($source));

      return Storage::url($dest);
    } else {
      return '';
    }
  }

  public static function removeAdminAssets($id) {

      $destDir = storage_path('app/public/'.Auth::user()->id);
      File::cleanDirectory($destDir);
      File::deleteDirectory($destDir);
  }
}
 ?>
