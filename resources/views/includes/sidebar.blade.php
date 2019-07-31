<div class="col-md-4 col-xl-3">
    <div class="sidebar px-4 py-md-0">

        <h6 class="sidebar-title">Pesquisar</h6>
        <form class="input-group" action="" method="GET">
            <input type="text" class="form-control" name="search" placeholder="digite sua pesquisa"
                value="{{ request()->query('search') }}">
            <div class="input-group-addon">
                <span class="input-group-text"><i class="ti-search"></i></span>
            </div>
        </form>

        <hr>

        <h6 class="sidebar-title">Categories</h6>
        <div class="row link-color-default fs-14 lh-24">
            @foreach ($categorias as $categoria)
            <div class="col-6">
                <a href="{{ route('blog.category', ['category' => $categoria->slug]) }}">
                    {{ ($categoria->posts->count() > 0 ? $categoria->name : '') }}
                </a>
            </div>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">+ Posts</h6>
        @foreach ($postSidebar as $post)
        <a class="media text-default align-items-center mb-5" href="{{ route('blog.show', ['post' => $post->slug]) }}">
            <img class="rounded w-65px mr-4" src="{{ asset('storage/' . $post->image) }}">
            <p class="media-body small-2 lh-4 mb-0">{{ $post->title }}</p>
        </a>
        @endforeach

        <hr>

        <h6 class="sidebar-title">Tags</h6>
        <div class="gap-multiline-items-1">
            @foreach ($tags as $tag)
            <a class="badge badge-secondary" href="{{ route('blog.tag', ['tag' =>  $tag->slug]) }}">
                {{ ($tag->posts->count() > 0 ? $tag->name : '') }}
            </a>
            @endforeach
        </div>

        <hr>

        <h6 class="sidebar-title">Sobre RockBuzz</h6>
        <p class="small-3">Pense em uma agência que tem ampla experiência em modelos de negócios e o quanto isso pode
            colaborar com o seu negócio. Muito prazer, somos a Rockbuzz!.</p>


    </div>
</div>