<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Camiseta;
use Illuminate\Support\Facades\File;

class ImportarCamisetas extends Command
{
    protected $signature = 'importar:camisetas';
    protected $description = 'Importar camisetas desde productos.json';

    public function handle()
    {
        $jsonPath = storage_path('app/productos.json'); // Guarda el JSON en storage/app/
        if (!File::exists($jsonPath)) {
            $this->error('El archivo productos.json no existe.');
            return;
        }

        $jsonData = json_decode(File::get($jsonPath), true);

        foreach ($jsonData as $item) {
            Camiseta::updateOrCreate(
                ['id' => $item['id']], // Evita duplicados
                [
                    'nombre' => $item['nombre'],
                    'precio' => $item['precio'],
                    'descripcion' => $item['descripcion'],
                    'imagen' => $item['imagen']
                ]
            );
        }

        $this->info('Camisetas importadas correctamente.');
    }
}
