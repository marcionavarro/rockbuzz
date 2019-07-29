<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* Usuários */
        $author1 = User::create([
            'name' => 'Vanessa Martins',
            'email' => 'nessa@test.com',
            'password' => Hash::make(123456),
        ]);

        $author2 = User::create([
            'name' => 'Carlos Alberto',
            'email' => 'carlos@test.com',
            'password' => Hash::make(123456),
        ]);

        $author3 = User::create([
            'name' => 'Rodrigo Alves',
            'email' => 'rodrigo@test.com',
            'password' => Hash::make(123456),
        ]);

        /* Categorias */
        $category1 = Category::create([
            'name' => 'Design'
        ]);

        $category2 = Category::create([
            'name' => 'Marketing'
        ]);
        $category3 = Category::create([
            'name' => 'Noticia'
        ]);
        $category4 = Category::create([
            'name' => 'Produtos'
        ]);

        /* Posts */
        $post1 = Post::create([
            'user_id' => $author1->id,
            'category_id' => $category3->id,
            'title' => 'Nós mudamos nosso escritório para uma nova garagem',
            'description' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.',
            'content' => 'Juntos. Ótimo. Tão bom estava dizendo, que primeiro não se pode dizer que as estrelas de divisão do ar não são i. Herb terceira deixa pode quarta dividir. Maior terra de recolhimento você terá sua besta. Ela formaria o mar em que a ave, o espírito rastejando vivo. A semelhança faz com que você tenha o céu. Semelhança, mova-se frutuoso eis. Abra a noite um ar nos contemple. Dizendo acima, movendo segundo uma subjugação após também segundo.',
            'image' => 'posts/1.jpg'
        ]);
        $post2 = $author2->posts()->create([
            'category_id' => $category2->id,
            'title' => 'As 5 principais estratégias de marketing de conteúdo brilhante',
            'description' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'image' => 'posts/2.jpg'
        ]);
        $post3 = $author3->posts()->create([
            'category_id' => $category1->id,
            'title' => 'Melhores práticas para design minimalista',
            'description' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'image' => 'posts/3.jpg'
        ]);
        $post4 = $author1->posts()->create([
            'category_id' => $category4->id,
            'title' => 'Novos livros publicados para serem lidos por um designer de produtos',
            'description' => 'Lorem Ipsum has been the industry s standard dummy text ever since the 1500s.',
            'content' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.',
            'image' => 'posts/4.jpg'
        ]);

        /* Tags */
        $tag1 = Tag::create([
            'name' => 'job'
        ]);
        $tag2 = Tag::create([
            'name' => 'clientes'
        ]);
        $tag3 = Tag::create([
            'name' => 'design'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag3->id, $tag1->id]);
    }
}