<?php
use App\Models\Language;

/**
 * Class LanguagesSeeder
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class LanguagesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Language::truncate();
        Schema::enableForeignKeyConstraints();

        $data = $this->csv_to_array(base_path() . '/database/seeds/csv_files/languages.csv', ';');

        try {
            foreach ($data as $d) {
                $language = new Language([
                    'name' => Purifier::clean($d['name'], 'generalFields'),
                    'iso_code' => Purifier::clean($d['code'], 'generalFields')
                ]);
                $language->save();
            }

            $this->command->info(
                "Finished seeding " . count(Language::all()) . " languages."
            );
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}
