<?php

namespace Edalzell\PrivateEye;

class DownloadController extends BaseController
{
    public function __invoke(string $code)
    {
        if (! file_exists($path = $this->asset($code)->resolvedPath())) {
            return back()->withErrors('File not found', 'download');
        }

        return response()->download($path);
    }
}
