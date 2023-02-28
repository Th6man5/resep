<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Country;
use App\Models\Ingredients;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // User::factory(3)->create();

        Country::create([
            'name' => 'Italy',
        ]);

        Country::create([
            'name' => 'Internasional',
        ]);

        Category::create([
            'name' => 'homemade',
        ]);

        Category::create([
            'name' => 'cheap',
        ]);

        User::create([
            'name' => 'Raihan',
            'username' => 'Raihanm854',
            'email' => 'raihan@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'Jonathan',
            'username' => 'JoNathan',
            'email' => 'coba@gmail.com',
            'password' => bcrypt('12345'),
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'nimda',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => true
        ]);

        User::create([
            'name' => 'raihan',
            'username' => 'th6man5',
            'email' => 'raihanm@gmail.com',
            'password' => bcrypt('12345'),
            'is_admin' => true
        ]);

        Recipe::create([
            'image' => '/recipes-images/bakso.jpg',
            'recipe_name' => 'Homemade Bakso',
            'about' => 'bakso yang di buat dengan cinta',
            'time' => '60',
            'portion' => '2',
            'ingredients' => '500 gr Daging bagian sengkel dalam keadaan dingin ( potong kecil)<br>
100 gr Es batu<br>
100 gr Tepung sagu<br>
2 sdm Bawang merah goreng<br>
1 sdm Bawang putih goreng<br>
1 Butir putih telur ukuran besar<br>
½ sdt Garam<br>
½ sdt Lada bubuk<br>
½ sdt Kaldu bubuk<br>
1 sdt Baking powder<br>',
            'steps' => '1. Panaskan air untuk kaldu, masukkan tetelan, bawang merah dan bawang putih goreng, lalu biarkan mendidih. Jangan lupa untuk memasak air kaldu minimum 1 jam sebelumnya dengan api keci.<br><br>
2. Masukkan semua bahan ke dalam food processor, kecuali tepung, baking powder dan es batu. Giling sampai halus kemudian masukkan tepung dan es, lalu giling kembali. Adoanan harus seperti pasta.<br><br>
3. Remas-remas adoanan dengan tangan hingga muncul di sela ibu jari dan telunjuk. Gunakan sendok untuk mengambil adonan, kemudian masukkan ke panci kaldu yang airnya masih panas, tetapi dalam keadaan kompor mati. Lakukan sampai habis.<br><br>
4. Moms juga bisa menggunakan dua buah sendok untuk membulatkan bakso. Jika sendok lengket, cukup celupkan dalam air biasa<br><br>
5. Nyalakan kompor dengan api kecil, sampai bakso mengambang. Setelah selesai smua, didihkan sekali lagi.<br><br>
6. Ambil atau angkat bakso sapi urat, kemudian masukkan ke dalam wadah yang berisi air dan es batu untuk mendinginkan bakso.<br><br>
7. Bakso sapi urat siap digunakan dan masukkan seledri serta daun bawang ke panci kaldu.<br><br>
Jika Moms tidak suka bakso urat, Moms tetap dapat mengikuti resep bakso sapi ini, tetapi cukup ganti jenis dagingnya saja dan usahakan jangan pilih daging yang berlemak.',
            'country_id' => '2',
            'category_id' => '1',
            'user_id' => '1',
        ]);

        Recipe::create([
            'image' => '/recipes-images/spagheti.jpeg',
            'recipe_name' => 'Spagheti Bolognese',
            'about' => 'Spaghetti Bolognese is a classic Italian dish made with ground beef, tomato sauce, and herbs. This hearty and comforting meal is perfect for any occasion.',
            'time' => '30',
            'portion' => '4',
            'ingredients' => '1 pound spaghetti <br>
1 pound ground beef<br>
1 onion, chopped<br>
3 cloves garlic, minced<br>
1 can (28 oz) crushed tomatoes<br>
2 tbsp tomato paste<br>
2 tbsp olive oil<br>
1 tsp dried oregano<br>
1 tsp dried basil<br>
Salt and pepper, to taste<br>
Grated Parmesan cheese, for serving<br>',
            'steps' => '1. Cook spaghetti according to package directions until al dente. Drain and set aside.<br>
2. Heat olive oil in a large skillet over medium-high heat.<br>
3. Add the ground beef and cook until browned, breaking it up into small pieces with a spatula.<br>
4. Add the chopped onion and minced garlic to the skillet and cook until softened.<br>
5. Stir in the crushed tomatoes, tomato paste, oregano, basil, salt, and pepper.<br>
6. Bring the sauce to a simmer and cook for 20 minutes, stirring occasionally.<br>
7. Serve the sauce over the cooked spaghetti with grated Parmesan cheese on top.<br>',
            'country_id' => '1',
            'category_id' => '2',
            'user_id' => '2',
        ]);

        Recipe::create([
            'image' => '/recipes-images/chicken.jpg',
            'recipe_name' => 'Chicken Curry',
            'about' => 'Chicken Curry is a flavorful and aromatic dish that is popular in many different cuisines around the world. This recipe features tender chicken simmered in a rich and spicy curry sauce that is sure to warm you up from the inside out.',
            'time' => '2',
            'portion' => '2',
            'ingredients' => '1 lb boneless, skinless chicken breasts, cut into small pieces<br>
1 onion, chopped<br>
3 cloves garlic, minced<br>
1 can (14 oz) diced tomatoes<br>
1 can (14 oz) coconut milk<br>
2 tbsp vegetable oil<br>
2 tbsp curry powder<br>
1 tsp ground cumin<br>
1 tsp ground coriander<br>
1/2 tsp ground ginger<br>
Salt and pepper, to taste<br>
Fresh cilantro, for garnish<br>',
            'steps' => '1. Heat the vegetable oil in a large skillet over medium-high heat.<br>
2. Add the chopped onion and minced garlic to the skillet and cook until softened.<br>
3. Stir in the curry powder, cumin, coriander, and ginger, and cook for another minute.<br>
4. Add the chicken pieces to the skillet and cook until browned on all sides.<br>
5. Pour in the diced tomatoes and coconut milk, and stir until well combined.<br>
6. Bring the curry to a simmer and cook for 20-25 minutes, or until the chicken is cooked through and the sauce has thickened.<br>
7. Season with salt and pepper to taste.<br>
8. Garnish with fresh cilantro and serve over rice or with naan bread.<br>',
            'country_id' => '2',
            'category_id' => '2',
            'user_id' => '1',
        ]);


        Recipe::create([
            'image' => '/recipes-images/herbchicken.jpg',
            'recipe_name' => 'Lemon and Herb Roast Chicken',
            'about' => 'Lemon and Herb Roast Chicken is a classic and delicious dish that is perfect for any occasion. The combination of tender chicken and bright lemon flavor, along with savory herbs, makes this a family favorite.',
            'time' => '90',
            'portion' => '6',
            'ingredients' => '1 whole chicken (about 4 pounds)<br>
2 lemons, sliced<br>
4 sprigs fresh rosemary<br>
4 sprigs fresh thyme<br>
4 cloves garlic, minced<br>
2 tbsp olive oil<br>
Salt and pepper, to taste<br>',
            'steps' => '1. Preheat the oven to 400°F.<br>
2. Rinse the chicken inside and out with cold water, and pat dry with paper towels.<br>
3. In a small bowl, mix together the minced garlic and olive oil.<br>
4. Rub the garlic and oil mixture all over the chicken, making sure to get under the skin.<br>
5. Season the chicken with salt and pepper, both inside and out.<br>
6. Stuff the chicken with the sliced lemons, rosemary sprigs, and thyme sprigs.<br>
7. Tie the legs together with kitchen twine.<br>
8. Place the chicken in a roasting pan and roast for 1 to 1 1/2 hours, or until the internal temperature reaches 165°F.<br>
9. Let the chicken rest for 10 minutes before carving.<br>
10. Serve with the roasted lemons and herbs on top.<br>',
            'country_id' => '2',
            'category_id' => '2',
            'user_id' => '1',
        ]);

        Recipe::create([
            'image' => '/recipes-images/tomatosoup.jpg',
            'recipe_name' => 'Tomato and Basil Soup',
            'about' => 'Tomato and Basil Soup is a simple yet flavorful soup that is perfect for a cozy meal on a chilly day. This recipe features ripe tomatoes, aromatic basil, and a touch of cream for a smooth and creamy texture.',
            'time' => '2',
            'portion' => '2',
            'ingredients' => '2 lbs ripe tomatoes, chopped<br>
1 onion, chopped<br>
3 cloves garlic, minced<br>
4 cups vegetable broth<br>
1 cup heavy cream<br>
1/4 cup fresh basil leaves, chopped<br>
2 tbsp olive oil<br>
Salt and pepper, to taste<br>
Croutons, for serving<br>',
            'steps' => '1. Heat the olive oil in a large pot over medium-high heat.<br>
2. Add the chopped onion and minced garlic to the pot and cook until softened.<br>
3. Add the chopped tomatoes to the pot and stir to combine.<br>
4. Pour in the vegetable broth and bring the soup to a simmer.<br>
5. Reduce the heat to low and let the soup simmer for 20-25 minutes, or until the tomatoes are tender and the soup has thickened.<br>
6. Stir in the heavy cream and fresh basil leaves.<br>
7. Season with salt and pepper to taste.<br>
8. Using an immersion blender or transfer the soup to a blender, puree until smooth.<br>
9. Serve hot with croutons on top.',
            'country_id' => '1',
            'category_id' => '2',
            'user_id' => '2',
        ]);

        Recipe::create([
            'image' => '/recipes-images/beefstag.jpg',
            'recipe_name' => 'Beef Stroganoff',
            'about' => 'Beef Stroganoff is a classic comfort food that is perfect for a hearty meal on a cool night. This recipe features tender strips of beef cooked in a rich and creamy mushroom sauce, served over a bed of egg noodles.',
            'time' => '2',
            'portion' => '2',
            'ingredients' => '1 lb beef sirloin, sliced into thin strips<br>
8 oz mushrooms, sliced<br>
1 onion, chopped<br>
2 cloves garlic, minced<br>
1/2 cup beef broth<br>
1/2 cup sour cream<br>
1/4 cup all-purpose flour<br>
2 tbsp butter<br>
1 tbsp olive oil<br>
1 tsp paprika<br>
Salt and pepper, to taste<br>
Egg noodles, for serving<br>
Fresh parsley, for garnish<br>',
            'steps' => '1. Cook egg noodles according to package directions, and set aside.<br>
2. In a large skillet over medium-high heat, melt the butter and olive oil.<br>
3. Add the sliced beef to the skillet and cook until browned on all sides. Remove the beef from the skillet and set aside.<br>
4. Add the chopped onion and sliced mushrooms to the skillet and cook until the mushrooms are tender and the onion is translucent.<br>
5. Add the minced garlic and paprika to the skillet and cook for another minute.<br>
6. Sprinkle the flour over the vegetables and stir until well combined.<br>
7. Gradually add the beef broth to the skillet, stirring constantly, and bring to a simmer.<br>
8. Return the beef to the skillet and stir to combine.<br>
9. Reduce the heat to low and let the beef simmer for 10-15 minutes, or until the sauce has thickened and the beef is cooked through.<br>
10. Stir in the sour cream until well combined.<br>
11. Season with salt and pepper to taste.<br>
Serve the beef stroganoff over the egg noodles and garnish with fresh parsley.',
            'country_id' => '2',
            'category_id' => '1',
            'user_id' => '1',
        ]);


        // Recipe::factory(100)->create();
    }
}
