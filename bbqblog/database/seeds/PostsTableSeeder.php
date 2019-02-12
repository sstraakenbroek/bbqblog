<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class)->create([
            'title' => 'Weber Master Touch GBS Smoke Gray',
            'subtitle' => 'Houtskool BBQ van 57 cm',
            'description' => 'Beef corned beef drumstick, cow meatball pork chop flank t-bone short loin shank ground round boudin tongue. Tongue spare ribs meatloaf capicola. Pork belly brisket pig turkey, buffalo tenderloin tri-tip ribeye kielbasa pork short ribs cupim sausage capicola. Tenderloin buffalo turducken, pig t-bone pork belly doner brisket porchetta salami biltong pork. Short ribs pancetta alcatra, flank picanha spare ribs ribeye cow sausage turducken corned beef tongue doner capicola sirloin.',
            'background' => 'storage/img/weber.jpg'
        ]);
        factory(App\Post::class)->create([
            'title' => 'Weber GBS accessoires',
            'subtitle' => 'Sear Grate, Wok',
            'description' => 'Tongue swine kielbasa, leberkas ham hock picanha rump sausage tri-tip. Ham hock strip steak biltong jerky alcatra bacon landjaeger beef salami andouille shank. Turkey ball tip sirloin leberkas short loin pork, picanha tri-tip chuck andouille kevin pork loin prosciutto ribeye beef. Picanha pork belly tail, prosciutto t-bone drumstick turkey beef chicken turducken ground round meatball pork loin leberkas. Alcatra filet mignon ham shoulder kevin pork. Pancetta shoulder chuck pork chop, bresaola tenderloin jerky. Fatback tongue pork loin tri-tip, corned beef frankfurter brisket ball tip hamburger shank short ribs pork chop beef ribs cow bacon.',
            'background' => 'storage/img/gbs.jpg'
        ]);
        factory(App\Post::class)->create([
            'title' => 'GrillEye Pro Plus',
            'subtitle' => 'Barbecuethermometer',
            'description' => 'Sirloin jerky short loin, ball tip alcatra pork belly chuck corned beef filet mignon swine drumstick tenderloin kevin. Pork chop buffalo meatball pig hamburger corned beef ham hock kevin. Cupim flank biltong capicola, turkey brisket swine beef ribs. Ham hock meatball chicken shankle cupim. Beef beef ribs filet mignon, pig strip steak turducken tenderloin pork chop. Shankle meatball filet mignon burgdoggen bacon jowl. Cupim pig pancetta kielbasa.',
            'background' => 'storage/img/grilleye.jpg'
        ]);
    }
}
