<?php

declare(strict_types=1);

namespace SkeletonPHP\Models;

final class SampleModel
{
    /**
     * Return sample profile data for demonstration purposes.
     *
     * @return array<int, array{name: string, value: string}>
     */
    public function getProfile(): array
    {
        return [
            ['name' => 'Name', 'value' => 'John Doe'],
            ['name' => 'Email', 'value' => 'johndoe@example.com'],
            ['name' => 'Bio', 'value' => 'Software developer with 10 years of experience.'],
        ];
    }
}
