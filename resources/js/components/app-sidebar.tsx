import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/react';
import { BookOpen, Folder, LayoutGrid, NotebookTabs,BookUser,BookDashed, Notebook, NotebookPen} from 'lucide-react';
import AppLogo from './app-logo';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        url: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title:'Books',
        url:'/books',
        icon: NotebookTabs,
    },
    {
        title:'Author',
        url:'/authors',
        icon:BookUser,
    },
    {
        title:'Publisher',
        url:'/publishers',
        icon:BookDashed,
    },
    {
        title:'Author Profile',
        url:'/author_profiles',
        icon:BookUser,
    },
    {
        title:'Genre',
        url:'/genres',
        icon:NotebookTabs,
    },
    {
        title:'Manager',
        url:'/managers',
        icon:BookUser,
    },
    {
        title:'Product',
        url:'/products',
        icon:NotebookTabs,
    },
    {
        title:'Review',
        url:'/reviews',
        icon:NotebookPen,
    },
    {
        title:'Supplier',
        url:'/suppliers',
        icon:Notebook,
    },
    {
        title:'Warehouse',
        url:'/warehouses',
        icon:NotebookTabs,
    },
];

const footerNavItems: NavItem[] = [
    {
        title: 'Repository',
        url: 'https://github.com/laravel/react-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        url: 'https://laravel.com/docs/starter-kits',
        icon: BookOpen,
    },
];

export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href="/dashboard" prefetch>
                                <AppLogo />
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <NavFooter items={footerNavItems} className="mt-auto" />
                <NavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
