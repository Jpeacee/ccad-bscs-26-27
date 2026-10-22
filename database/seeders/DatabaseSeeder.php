<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\AuthorProfile;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Manager;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Review;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function (): void {
            User::firstOrCreate(
                ['email' => 'demo@example.com'],
                ['name' => 'Demo User', 'password' => 'password'],
            );
            while (User::count() < 5) {
                User::factory()->create();
            }

            while (Publisher::count() < 5) {
                Publisher::factory()->create();
            }
            $publishers = Publisher::query()->orderBy('id')->get();

            while (Supplier::count() < 5) {
                $number = Supplier::count() + 1;
                Supplier::create(['supplier_name' => "Sample Supplier {$number}"]);
            }
            $suppliers = Supplier::query()->orderBy('id')->get();

            while (Warehouse::count() < 5) {
                $number = Warehouse::count();
                Warehouse::create([
                    'location' => 'Sample Warehouse '.($number + 1),
                    'supplier_id' => $suppliers[$number % $suppliers->count()]->id,
                ]);
            }
            $warehouses = Warehouse::query()->orderBy('id')->get();

            while (Manager::count() < 5) {
                $number = Manager::count();
                Manager::create([
                    'manager_name' => 'Sample Manager '.($number + 1),
                    'warehouse_id' => $warehouses[$number % $warehouses->count()]->id,
                ]);
            }

            while (Genre::count() < 5) {
                $number = Genre::count() + 1;
                Genre::create(['genre_name' => "Sample Genre {$number}"]);
            }

            while (Author::count() < 5) {
                $number = Author::count();
                Author::factory()->create([
                    'author_name' => 'Sample Author '.($number + 1),
                    'publisher_id' => $publishers[$number % $publishers->count()]->id,
                ]);
            }
            $authors = Author::query()->orderBy('id')->get();

            while (AuthorProfile::count() < 5) {
                $number = AuthorProfile::count();
                AuthorProfile::factory()->create([
                    'author_id' => $authors[$number % $authors->count()]->id,
                    'bio' => 'Sample biography for author '.($number + 1).'.',
                ]);
            }

            while (Book::count() < 5) {
                $number = Book::count();
                $author = $authors[$number % $authors->count()];
                Book::factory()->create([
                    'title' => 'Sample Book '.($number + 1),
                    'author_id' => $author->id,
                    'publisher_id' => $author->publisher_id,
                ]);
            }
            $books = Book::query()->orderBy('id')->get();
            $genres = Genre::query()->orderBy('id')->get();

            foreach ($books as $book) {
                foreach ($genres as $genre) {
                    if (DB::table('book_genre')->count() >= 5) {
                        break 2;
                    }

                    $book->genres()->syncWithoutDetaching([$genre->id]);
                }
            }

            while (Product::count() < 5) {
                $number = Product::count() + 1;
                Product::create([
                    'prod_name' => "Sample Product {$number}",
                    'price' => number_format(9.99 + $number, 2, '.', ''),
                ]);
            }

            $users = User::query()->orderBy('id')->get();
            while (Review::count() < 5) {
                $number = Review::count();
                Review::create([
                    'stars' => (string) (($number % 5) + 1),
                    'comment' => 'Sample review '.($number + 1).' for testing.',
                    'reviewable_type' => Book::class,
                    'book_id' => $books[$number % $books->count()]->id,
                    'user_id' => $users[$number % $users->count()]->id,
                ]);
            }
        });
    }
}
