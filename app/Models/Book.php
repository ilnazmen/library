<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\Conversions\Conversion;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $guarded = false;

    public function genre()
    {
        return $this->belongsToMany(Genre::class);

    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function media(): MorphMany
    {
        // TODO: Implement media() method.
    }

    public function addMedia(string|UploadedFile $file): FileAdder
    {
        // TODO: Implement addMedia() method.
    }

    public function copyMedia(string|UploadedFile $file): FileAdder
    {
        // TODO: Implement copyMedia() method.
    }

    public function hasMedia(string $collectionName = ''): bool
    {
        // TODO: Implement hasMedia() method.
    }

    public function getMedia(string $collectionName = 'default', callable|array $filters = []): Collection
    {
        // TODO: Implement getMedia() method.
    }

    public function clearMediaCollection(string $collectionName = 'default'): HasMedia
    {
        // TODO: Implement clearMediaCollection() method.
    }

    public function clearMediaCollectionExcept(string $collectionName = 'default', array|Collection $excludedMedia = []): HasMedia
    {
        // TODO: Implement clearMediaCollectionExcept() method.
    }

    public function shouldDeletePreservingMedia(): bool
    {
        // TODO: Implement shouldDeletePreservingMedia() method.
    }

    public function loadMedia(string $collectionName)
    {
        // TODO: Implement loadMedia() method.
    }

    public function addMediaConversion(string $name): Conversion
    {
        // TODO: Implement addMediaConversion() method.
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // TODO: Implement registerMediaConversions() method.
    }

    public function registerMediaCollections(): void
    {
        // TODO: Implement registerMediaCollections() method.
    }

    public function registerAllMediaConversions(): void
    {
        // TODO: Implement registerAllMediaConversions() method.
    }
}
