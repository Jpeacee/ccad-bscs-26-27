// import React from 'react';
// import{Link, router} from '@inertiajs/react';
// import type {AuthorProfile} from '@/types/models';

// export default function index(){
//     return (
//         <div>
//             <h1>Author</h1>
//             <Link href={route('authors.create')}>Create Author</Link>
//         </div>

//     )
// }

import React from 'react';
import { Link, router } from '@inertiajs/react';

interface Author {
    id: number;
    author_name: string;
    publisher?: { publisher_name: string } | null;
    books_count?: number | null;
}

interface PaginatedAuthors {
    data: Author[];
}

interface Props {
    authors: PaginatedAuthors;
}

export default function Index({ authors }: Props) {
    const handleDelete = (id: number) => {
        if (confirm('Are you sure you want to delete this author?')) {
            router.delete(`/authors/${id}`);
        }
    };

    return (
        <div className="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            {/* Header Section */}
            <div className="flex justify-between items-center mb-6">
                <div>
                    <h1 className="text-xl font-bold text-gray-900 dark:text-white">Authors</h1>
                    <p className="text-sm text-gray-500 dark:text-gray-400">Manage author profiles and details</p>
                </div>
                <Link
                    href="/authors/create"
                    className="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md transition"
                >
                    + Add Author
                </Link>
            </div>

            {/* Table Component */}
            <div className="overflow-x-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                <table className="w-full text-left text-sm">
                    <thead className="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-700">
                        <tr className="text-xs font-semibold text-gray-500 uppercase">
                            <th className="py-3 px-4">ID</th>
                            <th className="py-3 px-4">Author</th>
                            <th className="py-3 px-4">Publisher</th>
                            <th className="py-3 px-4">Books</th>
                            <th className="py-3 px-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody className="divide-y divide-gray-100 dark:divide-gray-700">
                        {authors.data.length > 0 ? (
                            authors.data.map((author: Author) => (
                                <tr key={author.id} className="hover:bg-gray-50 dark:hover:bg-gray-700/30">
                                    <td className="py-3 px-4 font-medium text-gray-900 dark:text-white">#{author.id}</td>
                                    <td className="py-3 px-4 font-medium text-gray-800 dark:text-gray-200">{author.author_name}</td>
                                    <td className="py-3 px-4 text-gray-500">{author.publisher?.publisher_name ?? '—'}</td>
                                    <td className="py-3 px-4 text-gray-500">{author.books_count ?? 0}</td>
                                    <td className="py-3 px-4 text-right space-x-3">
                                        <Link
                                            href={`/authors/${author.id}/edit`}
                                            className="text-indigo-600 hover:text-indigo-900 dark:hover:text-indigo-400 font-medium"
                                        >
                                            Edit
                                        </Link>
                                        <button
                                            onClick={() => handleDelete(author.id)}
                                            className="text-red-600 hover:text-red-900 dark:hover:text-red-400 font-medium"
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            ))
                        ) : (
                            <tr>
                                <td colSpan={5} className="py-6 text-center text-gray-500">
                                    No authors found.
                                </td>
                            </tr>
                        )}
                    </tbody>
                </table>
            </div>
        </div>
    );
}
