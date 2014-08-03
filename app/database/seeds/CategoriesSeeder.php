<?php

class CategoriesSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		DB::table('categories')->delete();

                

        $communityProgrammation = Community::where('name', 'Programmation')->FirstOrFail();
        $communityCuisine = Community::where('name', 'Cuisine')->FirstOrFail();
        $communityNature = Community::where('name', 'Nature')->FirstOrFail();

        Categorie::create(array(
        	'name' => 'Php',
                'community_id' => $communityProgrammation->id,
        	'description' => 'Catégorie Php'
        	));

        $categoriePhp = Categorie::where('name', 'Php')->FirstOrFail();

        Categorie::create(array(
        	'name' => 'Laravel',
        	'parent_id' => $categoriePhp->id,
                'community_id' => $communityProgrammation->id,
        	'description' => 'Catégorie Laravel'
        	));

        Categorie::create(array(
                'name' => 'Java',
                'parent_id' => $categoriePhp->id,
                'community_id' => $communityProgrammation->id,
                'description' => 'Catégorie Java'
                ));

        $categorieLaravel = Categorie::where('name', 'Laravel')->FirstOrFail();

        Categorie::create(array(
                'name' => 'Cookies',
                'parent_id' => $categorieLaravel->id,
                'community_id' => $communityProgrammation->id,
                'description' => 'Nom nom nom'
                ));

        Categorie::create(array(
        	'name' => 'Omelette',
                'community_id' => $communityCuisine->id,
        	'description' => 'Catégorie Omelette'
        	));

        Categorie::create(array(
                'name' => 'Soin',
                'community_id' => $communityNature->id,
                'description' => 'Catégorie Bain de boue'
                ));
        }
}
