<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quote;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * This creates 20 quotes when the seeder is run
         * You can add other quotes here that will get seeded in database when php artisan db:seed is run
         */

        Quote::create([
            'text' => 'Pleasure in the job puts perfection in the work.',
            'author' => 'Aristotle',
        ]);

        Quote::create([
            'text' => 'Imagination is more important than knowledge.',
            'author' => 'Albert Einstein',
        ]);

        Quote::create([
            'text' => 'The harder I work, the luckier I get.',
            'author' => 'Samuel Goldwyn',
        ]);

        Quote::create([
            'text' => 'The scariest moment is always just before you start.',
            'author' => 'Stephen King',
        ]);

        Quote::create([
            'text' => 'If you tell the truth, you don\'t have to remember anything.',
            'author' => 'Mark Twain',
        ]);

        Quote::create([
            'text' => 'Time is money.',
            'author' => 'Benjamin Franklin',
        ]);

        Quote::create([
            'text' => 'I\'ve failed over and over and over again in my life and that is why I succeed.',
            'author' => 'Michael Jordan',
        ]);

        Quote::create([
            'text' => 'Most people give up just when they\'re about to achieve success. They quit on the one year line. They give up at the last minute of the game one foot from a winning touchdown.',
            'author' => 'Ross Perot',
        ]);

        Quote::create([
            'text' => 'Somewhere, something incredible is waiting to be known.',
            'author' => 'Carl Sagan',
        ]);

        Quote::create([
            'text' => 'The most beautiful thing we can experience is the mysterious, It is the source of all true art and science.',
            'author' => 'Albert Einstein',
        ]);

        Quote::create([
            'text' => 'Strength and growth come only through continuous effort and struggle.',
            'author' => 'Napoleon Hill',
        ]);

        Quote::create([
            'text' => 'Strength does not come from winning. Your struggles develop your strengths. When you go through hardships and decide not to surrender, that is strength.',
            'author' => 'Arnold Schwarzenegger',
        ]);

        Quote::create([
            'text' => 'Above all, don\'t lie to yourself. The man who lies to himself and listens to his own lie come to a point that he cannot distinguish the truth within him, or around him, and so loses all respect for himself and for others. And having no respect he ceases to love.',
            'author' => 'Fyodor Dostoyevsky',
        ]);

        Quote::create([
            'text' => 'The books that help you most are those which make you think that most. The hardest way of learning is that of easy reading; but a great book that comes from a great thinker is a ship of thought, deep freighted with truth and beauty.',
            'author' => 'Pablo Neruda',
        ]);

        Quote::create([
            'text' => 'The saddest people I\'ve ever met in life are the ones who don\'t care deeply about anything at all. Passion and satisfaction go hand in hand, and without them, any happiness is only temporary, because there\'s nothing to make it last.',
            'author' => 'Nicholas Sparks',
        ]);

        Quote::create([
            'text' => 'Music is a higher revelation than all wisdom and philosophy.',
            'author' => 'Ludwig van Beethoven',
        ]);

        Quote::create([
            'text' => 'Opportunity does not knock, it presents itself when you beat down the door.',
            'author' => 'Kyle Chandler',
        ]);

        Quote::create([
            'text' => 'If you\'re going through hell, keep going.',
            'author' => 'Winston Churchill',
        ]);

        Quote::create([
            'text' => 'After a certain point, money is meaningless. It ceases to be the goal. The game is what counts.',
            'author' => 'Aristotle Onassis',
        ]);

        Quote::create([
            'text' => 'When the power of love overcomes the love of power the world will know peace.',
            'author' => 'Jimi Hendrix',
        ]);
    }
}
