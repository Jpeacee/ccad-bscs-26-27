import {FormEvent,HtmlHTMLAttributes} from 'react';
import {Link,useForm} from '@inertiajs/react';
import {Button} from '@/components/ui/button';
import {Input} from '@/components/ui/input';
import {Label} from '@/components/ui/label';

import { Publisher} from '@/types/models';
import { Table } from 'lucide-react';
import { TableBody, TableCell, TableHead, TableHeader, TableRow } from '@/components/ui/table';

type Props = {
    publisher?: Publisher;
}

export default function PublisherForm({ publisher }: Props)
{
    const form = useForm({
        publisher_name: publisher?.publisher_name??'',
    });

    function submit(event: FormEvent<HTMLFormElement>){
        event.preventDefault();

        if(publisher){
            form.put(route('publisher.update', publisher.id));
        }

        form.post(route('publisher.store'));
    }


    return(
       <form onSubmit={submit} className="space-y-6">
            <div className="space-y-2">
                <Label htmlFor="publisher_name">Publisher Name</Label>
                <Input
                    id="publisher_name"
                    name="publisher_name"
                    type="text"
                    required
                    value={form.data.publisher_name}
                    onChange={
                        (event) => form.setData("publisher_name", event.target.value)
                    }
                    placeholder="Enter publisher name"
                    maxLength={255}
                    aria-invalid={Boolean(form.errors.publisher_name)}
                    disabled={form.processing}
                >
                </Input>
                {form.errors.publisher_name && (
                    <p className="mt-2 text-sm text-red-600">
                        {form.errors.publisher_name}
                    </p>
                )}
                <div className="flex item_center gap-2">
                    <Button variant="default"  disabled={form.processing}>
                        {
                            form.processing ? 'Saving...' :
                             publisher ? 'Update Publisher' : 'Create Publisher'
                        }
                    </Button>

                    <Button variant="outline" size="lg" asChild>
                        <Link href={route('publisher.index')}>
                            Cancel
                        </Link>
                    </Button>

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
                                {publisher ? (
                                    [publisher].map((publisher) => (
                                        <TableRow key={publisher.id}>
                                            <TableCell>{publisher.id}</TableCell>
                                            <TableCell>{publisher.publisher_name}</TableCell>
                                            <TableCell>{new Date(publisher.created_at).toLocaleDateString()}</TableCell>
                                            <TableCell>
                                                <div className="flex justify-end">
                                                    <Button variant="outline" size="sm" asChild>
                                                        <Link href={route('publisher.edit', publisher.id)}>
                                                            Edit
                                                        </Link>
                                                    </Button>
                                                    <Button variant="destructive" size="sm" onClick={() => form.delete(route('publisher.destroy', publisher.id))}>
                                                        Delete
                                                    </Button>
                                                </div>
                                            </TableCell>
                                        </TableRow>
                                    ))
                                ) : (
                                    <TableRow>
                                        <TableCell colSpan={4} className="text-center">
                                            No publishers found.
                                        </TableCell>
                                    </TableRow>
                                )}
                            </TableBody>
                        </Table>
                    </div>
                </div>
            </div>
        </form>
    )


}
