<?php

declare(strict_types=1);

namespace SkeletonPHP\Views;

final class SampleView
{
    /**
     * @param array<int, array{name: string, value: string}> $data
     */
    public function render(array $data): string
    {
        $rows = '';

        foreach ($data as $item) {
            $label = htmlspecialchars((string) ($item['name'] ?? 'Unknown'), ENT_QUOTES, 'UTF-8');
            $value = htmlspecialchars((string) ($item['value'] ?? ''), ENT_QUOTES, 'UTF-8');
            $rows .= "<tr><th>{$label}</th><td>{$value}</td></tr>";
        }

        return <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkeletonPHP</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; background: #f7f7f7; color: #1f2937; }
        .card { max-width: 720px; margin: 0 auto; background: #fff; border-radius: 12px; padding: 2rem; box-shadow: 0 10px 25px rgba(0,0,0,0.08); }
        h1 { margin-top: 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 0.75rem; border-bottom: 1px solid #e5e7eb; text-align: left; }
        th { width: 140px; }
    </style>
</head>
<body>
    <div class="card">
        <h1>SkeletonPHP</h1>
        <table>
            {$rows}
        </table>
    </div>
</body>
</html>
HTML;
    }
}
