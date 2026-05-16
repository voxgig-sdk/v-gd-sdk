<?php
declare(strict_types=1);

// VGd SDK base feature

class VGdBaseFeature
{
    public string $version;
    public string $name;
    public bool $active;

    public function __construct()
    {
        $this->version = '0.0.1';
        $this->name = 'base';
        $this->active = true;
    }

    public function get_version(): string { return $this->version; }
    public function get_name(): string { return $this->name; }
    public function get_active(): bool { return $this->active; }

    public function init(VGdContext $ctx, array $options): void {}
    public function PostConstruct(VGdContext $ctx): void {}
    public function PostConstructEntity(VGdContext $ctx): void {}
    public function SetData(VGdContext $ctx): void {}
    public function GetData(VGdContext $ctx): void {}
    public function GetMatch(VGdContext $ctx): void {}
    public function SetMatch(VGdContext $ctx): void {}
    public function PrePoint(VGdContext $ctx): void {}
    public function PreSpec(VGdContext $ctx): void {}
    public function PreRequest(VGdContext $ctx): void {}
    public function PreResponse(VGdContext $ctx): void {}
    public function PreResult(VGdContext $ctx): void {}
    public function PreDone(VGdContext $ctx): void {}
    public function PreUnexpected(VGdContext $ctx): void {}
}
