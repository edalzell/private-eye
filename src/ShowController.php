<?php

namespace Edalzell\PrivateEye;

use League\Glide\Server;
use Statamic\Assets\Asset;
use Statamic\Imaging\ImageGenerator;

class ShowController extends BaseController
{
    public function __construct(private Server $server, private ImageGenerator $generator)
    {
    }

    public function __invoke(string $code)
    {
        return $this->server->getResponseFactory()->create(
            $this->server->getCache(),
            $this->generate($this->asset($code))
        );
    }

    private function generate(Asset $asset): string
    {
        return $this->generator->generateByAsset($asset, []);
    }
}
