import { Head } from '@inertiajs/react';
import PublisherForm from './publisher-form';
import AppLayout from '@/layouts/app-layout';

export default function Create(){
    return (
        <AppLayout>
            <Head title="Create Publisher" />
            <PublisherForm />
        </AppLayout>
    )
}
