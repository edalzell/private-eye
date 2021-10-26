<?php

namespace Edalzell\PrivateEye;

use Statamic\Facades\Asset as AssetFacade;
use Statamic\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    /**
     * @param string $code
     * @return \Statamic\Assets\Asset
     */
    protected function asset(string $code)
    {
        if (! $asset = AssetFacade::find(base64_decode($code))) {
            abort(404);
        }

        return $asset;
    }
}
