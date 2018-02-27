<?php
/**
 *
 */
use Illuminate\Support\Facades\File;

class CommonHelper {

  public static function serveAdminAssets($fileName, $filePath) {

    if(Auth::check()){
      $adminAssetsBasePath = public_path().'/admin_assets';

      $source = $adminAssetsBasePath.$filePath.$fileName;

      $destDir = public_path(Auth::user()->id.$filePath);

      File::makeDirectory($destDir, 0777, true, true);

      $dest = $destDir.$fileName;

      $res = File::copy($source, $dest);
      return Auth::user()->id.$filePath.$fileName;
    } else {
      return '';
    }
  }

  public static function removeAdminAssets($id) {

      $destDir = public_path(Auth::user()->id);

      File::deleteDirectory($destDir);
  }
}
 ?>
