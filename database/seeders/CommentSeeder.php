<?php
namespace	Database\Seeders;
use	Illuminate\Database\Seeder;
use	App\Models\News;
use	App\Models\Comment;
use	Faker\Factory	as	Faker;
class	CommentSeeder	extends	Seeder
{
	public	function	run():	void
    {
		$faker	=	Faker::create();
		$newsList	=	News::all();
		foreach	($newsList	as	$news)	{
		$count	=	rand(2,	6);	//	mỗi	bài	2-6	comment
		for	($i	=	0;	$i	<	$count;	$i++)	{
			Comment::create([
				'news_id'	=>	$news->id,
				'title'	=>	$faker->optional()->sentence(3),
				'content'	=>	$faker->paragraph(2),
				'author_id'	=>	null,	//	hoặc	rand	user	id	nếu	có	users
			]);
		}
		}
	}
}