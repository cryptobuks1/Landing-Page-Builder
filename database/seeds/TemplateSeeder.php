<?php

use App\Services\TemplateService;
use Illuminate\Database\Seeder;

/**
 * Class TemplateSeeder
 */
class TemplateSeeder extends Seeder
{

    /**
     * @var TemplateService
     */
    private $templateService;

    /**
     * TemplateSeeder constructor.
     * @param TemplateService $templateService
     */
    public function __construct(TemplateService $templateService)
    {
        $this->templateService = $templateService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = ['template1', 'template2'];

        foreach ($templates as $template) {

            $request = new \Illuminate\Http\Request();

            $request->merge(['name' => $template]);

            $this->templateService->store($request);
        }
    }
}
