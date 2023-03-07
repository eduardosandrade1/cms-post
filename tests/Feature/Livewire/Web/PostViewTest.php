<?php

namespace Tests\Feature\Livewire\Web;

use App\Http\Livewire\Web\PostView;
use App\Models\ItemLayout;
use App\Models\Post;
use App\Models\PostUserComment;
use App\Models\PostUserLike;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PostViewTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PostView::class);

        $component->assertStatus(200);
    }

    /** @test */
    public function the_component_has_one_route_to_render()
    {
        Livewire::actingAs(User::factory()->create());

        $this->assertAuthenticated();

        $this->get(route('web.view-posts'))
            ->assertStatus(200);
    }

    /** @test */
    public function the_user_can_not_access_the_posts_without_authentication()
    {
        $this->get(route('list.posts'))
            ->assertRedirect(route('login.create'));
    }

    /** @test */
    public function the_component_can_like_post()
    {

        Livewire::actingAs(User::factory()->create());

        $this->assertAuthenticated();

        $post = Post::factory()->create();


        Livewire::test(PostView::class)
            ->call('addLikePost', $post->id)
            ->assertHasNoErrors();

        $this->assertTrue(PostUserLike::where('post_id', $post->id)->exists());

    }

    /** @test */
    public function the_component_can_remove_like_post()
    {

        $user = User::factory()->create();

        Livewire::actingAs($user);

        $this->assertAuthenticated();

        $post = Post::factory()->create();

        # added
        Livewire::test(PostView::class)
            ->call('addLikePost', $post->id)
            ->assertHasNoErrors();

        $this->assertTrue(PostUserLike::where('post_id', $post->id)->where('user_id', $user->id)->exists());

        # need remove
        Livewire::test(PostView::class)
            ->call('addLikePost', $post->id)
            ->assertHasNoErrors();

        $this->assertTrue(PostUserLike::where('post_id', $post->id)->where('user_id', $user->id)->doesntExist());
    }

    /** @test */
    public function the_user_can_add_comment()
    {
        $user = User::factory()->create();

        Livewire::actingAs($user);

        $this->assertAuthenticated();

        $post = Post::factory()->create();

        # added
        Livewire::test(PostView::class)
            ->set('contentComment', 'Content teste')
            ->call('addCommentPost', $post->id)
            ->assertHasNoErrors();

        $this->assertTrue(PostUserComment::where('post_id', $post->id)->where('user_id', $user->id)->exists());
    }

}
