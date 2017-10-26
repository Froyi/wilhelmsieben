<?php
declare(strict_types=1);

namespace Project\Module\GenericValueObject;

use claviska\SimpleImage;

class Image
{
    const PATH_NEWS = 'data/img/news/';
    const PATH_GALERY = 'data/img/galerie/';

    /** @var SimpleImage $image */
    protected $image;

    /** @var string $imagePath */
    protected $imagePath;

    /** @var  array $tempImage */
    protected $tempImage;

    /**
     * Image constructor.
     * @param string $path
     */
    protected function __construct(string $path)
    {
        $this->image = new SimpleImage($path);
        $this->imagePath = $path;

    }

    /**
     * @param string $path
     * @return Image
     */
    public static function fromFile(string $path): self
    {
        return new self($path);
    }

    /**
     * @param array  $uploadedFile
     * @param string $path
     * @return null|Image
     */
    public static function fromUploadWithSave(array $uploadedFile, string $path): ?self
    {
        $image = self::fromFile($uploadedFile['tmp_name']);
        $filePath = $path . $uploadedFile['name'];

        if ($image->saveToPath($filePath) === true) {
            return $image;
        }

        return null;
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return (string)$this->imagePath;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string)$this->imagePath;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->image->getWidth();
    }

    /**
     * @return SimpleImage
     */
    public function getImage(): SimpleImage
    {
        return $this->image;
    }

    /**
     * @param string $path
     * @return bool
     */
    public function saveToPath(string $path): bool
    {
        try {
            $this->image->toFile($path);
        } catch (\Error $error) {
            return false;
        }

        $this->imagePath = $path;

        return true;
    }
}