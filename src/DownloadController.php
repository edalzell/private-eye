<?php

namespace Edalzell\PrivateEye;

class DownloadController extends BaseController
{
    public function __invoke(string $code)
    {
        if (($asset = $this->asset($code)) && ! $asset->exists()) {
            return back()->withErrors('File not found', 'download');
        }

        return $asset->disk()->filesystem()->download($asset->path());
    }
}
