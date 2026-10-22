import { useState, type FormEvent } from 'react';
import { Head, Link, router } from '@inertiajs/react';
import AppLayout from '@/layouts/app-layout';

import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import {
    Table,
    TableBody,
    TableCell,
    TableHead,
    TableHeader,
    TableRow,
} from '@/components/ui/table';

import type { Publisher, PaginatedData } from '@/types/models';

type Props = {
    publishers: PaginatedData<Publisher>;
    filters: {
        search: string | null;
    };
};

export default function PublisherIndex({ publishers, filters }: Props) {
    const [search, setSearch] = useState(filters.search ?? '');

    function searchHandler(event: FormEvent<HTMLFormElement>) {
        event.preventDefault();

        router.get(
            route('publishers.index'),
            { search },
            { preserveState: true, replace: true },
        );
    }

    function deletePublisher(publisher: Publisher) {
        if (!window.confirm('Are you sure you want to delete this publisher?')) return;

        router.delete(route('publishers.destroy', publisher.id));
    }

    return (
        <AppLayout>
            <Head title="Publishers" />

            <div className="flex w-full flex-col gap-6 p-4 md:p-6">
                <div className="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                    <div className="space-y-1">
                        <h1 className="text-2xl font-semibold tracking-tight">Publishers</h1>
                        <p className="text-sm text-muted-foreground">
                            Manage the publishers in your library
                        </p>
                    </div>
                    <Button asChild>
                        <Link href={route('publishers.create')}>Add Publisher</Link>
                    </Button>
                </div>

                <form onSubmit={searchHandler} className="flex gap-2">
                    <Input
                        value={search}
                        onChange={(e) => setSearch(e.target.value)}
                        placeholder="Search publishers..."
                        className="max-w-sm"
                    />
                    <Button type="submit">Search</Button>
                    {filters.search && (
                        <Button variant="outline" asChild>
                            <Link href={route('publishers.index')}>Clear</Link>
                        </Button>
                    )}
                </form>

                <div className="overflow-hidden rounded-md border">
                    <Table>
                        <TableHeader>
                            <TableRow>
                                <TableHead className="w-20">ID</TableHead>
                                <TableHead>Publisher Name</TableHead>
                                <TableHead>Created At</TableHead>
                                <TableHead className="text-right">Actions</TableHead>
                            </TableRow>
                        </TableHeader>
                        <TableBody>
                            {publishers.data.length > 0 ? (
                                publishers.data.map((publisher) => (
                                    <TableRow key={publisher.id}>
                                        <TableCell>{publisher.id}</TableCell>
                                        <TableCell>{publisher.publisher_name}</TableCell>
                                        <TableCell>
                                            {new Date(publisher.created_at).toLocaleDateString()}
                                        </TableCell>
                                        <TableCell className="text-right">
                                            <div className="flex justify-end gap-2">
                                                <Button variant="outline" size="sm" asChild>
                                                    <Link href={route('publishers.edit', publisher.id)}>
                                                        Edit
                                                    </Link>
                                                </Button>
                                                <Button
                                                    variant="destructive"
                                                    size="sm"
                                                    onClick={() => deletePublisher(publisher)}
                                                >
                                                    Delete
                                                </Button>
                                            </div>
                                        </TableCell>
                                    </TableRow>
                                ))
                            ) : (
                                <TableRow>
                                    <TableCell colSpan={4} className="h-24 text-center">
                                        No publishers found.
                                    </TableCell>
                                </TableRow>
                            )}
                        </TableBody>
                    </Table>
                </div>
            </div>
        </AppLayout>
    );
}
