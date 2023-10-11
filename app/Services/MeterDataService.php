<?php

namespace App\Services;

use App\Models\MeterData;
use App\Models\MeterDataPhoto;
use App\RepositoryInterfaces\MeterDataRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;

class MeterDataService
{
    public function __construct(private readonly MeterDataRepositoryInterface $repository)
    {
    }

    public function getPaginated(int $bin, int $page): LengthAwarePaginator
    {
        return $this->repository->getPaginated($bin, $page);
    }

    public function store(array $data): array
    {
        $meterData = $this->repository->store(Arr::except($data, 'photos'));

        if (isset($data['photos'])) {
            foreach ($data['photos'] as $photo) {
                $this->storePhoto($meterData, $photo);
            }
        }

        return [
            'message' => 'l10n_meter_data_stored',
            'meter_data' => $meterData->load('photos'),
        ];
    }

    private function storePhoto(MeterData $meterData, UploadedFile $file): void
    {
        $filename = $file->store('photos', 'public');

        Image::make(public_path("storage/{$filename}"))
            ->orientate()
            ->fit(MeterDataPhoto::WIDTH, MeterDataPhoto::HEIGHT)
            ->save();

        $meterData->photos()->create([
            'path' => $filename,
        ]);
    }
}
