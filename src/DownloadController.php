<?php

namespace Edalzell\PrivateEye;

use Statamic\Facades\User;

class DownloadController extends BaseController
{
    public function __invoke(string $code)
    {
        if (! User::current()) {
            return back()->withErrors('Gotta be logged in', 'download');
        }

        if (! file_exists($path = $this->asset($code)->resolvedPath())) {
            return back()->withErrors('File not found', 'download');
        }

        return response()->download($path);
    }
}
