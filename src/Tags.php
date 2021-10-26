<?php

namespace Edalzell\PrivateEye;

use Statamic\Tags\Tags as BaseTags;

class Tags extends BaseTags
{
    protected static $handle = 'private_eye';

    public function download()
    {
        if (! $path = $this->params->get('path')) {
            return;
        }

        return route(
            'statamic.private-eye.download',
            [
                'code' => base64_encode("{$this->params->get('container', 'private')}::{$path}"),
            ]
        );
    }

    public function show()
    {
        if (! $path = $this->params->get('path')) {
            return;
        }

        return route(
            'statamic.private-eye.show',
            [
                'code' => base64_encode("{$this->params->get('container', 'private')}::{$path}"),
            ]
        );
    }
}
