import { Button } from '@/components/ui/button';
import { TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';
import AppLayout from '@/layouts/app-layout';
import type { Author, Book, Genre, PaginatedData, Publisher } from '@/types/models';

interface props {
    books: PaginatedData<Book>;
    filters: {
        search?: string;
    };
    authors: Author[];
    publishers: Publisher[];
    genres: Genre[];
}

export default function BookIndex({ books, filters, authors, publishers, genres }: props) {
    return (
        <AppLayout>
            <div className="w-full space-y-6 p-6">
                <div className="item-center flex justify-between">
                    <div>
                        <h1 className="text-2x1 font-bold tracking-tight">Books</h1>
                        <p className="text-muted-foreground text-sm">Manage your Books</p>
                    </div>

                    <Button size="lg">Add libro</Button>
                </div>

                <div className="rounded-2x1 bg-card text-card-foreground overflow-hidden border shadow-sm">
                    <table>
                        <TableHeader>
                            <TableRow>
                                <TableHead>Title</TableHead>
                                <TableHead>Author</TableHead>
                                <TableHead>Publisher</TableHead>
                                <TableHead>Price</TableHead>
                                <TableHead>Action</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {books.data && books.data.length > 0 ? (
                                books.data.map((book) => (
                                    <TableRow key={book.id}>
                                        <TableCell>{book.title}</TableCell>
                                        <TableCell>
                                            {book.author?.author_name ?? authors.find((author) => author.id === book.author_id)?.author_name ?? '-'}
                                        </TableCell>
                                        <TableCell>{book.publisher?.publisher_name}</TableCell>
                                        <TableCell>p {Number(book.price ?? 0).toFixed()}</TableCell>
                                        <TableCell>
                                            <Button size="sm">Edit</Button>
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableRow>
                                    <TableCell colSpan={5} className="text-muted-foreground h-24 text-center">
                                        No books found.
                                    </TableCell>
                                </TableRow>
                            )}
                        </TableBody>
                    </table>
                </div>
            </div>
        </AppLayout>
    );
}
