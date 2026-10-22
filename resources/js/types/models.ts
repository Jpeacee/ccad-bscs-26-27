export interface PaginatedData<T> {
    data: T[];
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
    links: { url: string | null; label: string; active: boolean }[];
}

export interface Publisher {
    id: number;
    publisher_name: string;
    created_at: string;
}

export interface Author {
    id: number;
    name: string;
}

export interface AuthoProfile{
    id:number,
    author_id: number,
    bio: string
}

export interface Genre {
    id: number;
    genre_name: string;
}

export interface Book {
    id: number;
    author_id: number;
    publisher_id: number;
    title: string;
    slug: string;
    isbn: string;
    price: number;
    description: string;
    image: string | null;
    author?: Author;
    publisher?: Publisher;
    genres?: Genre[];
    created_at?: string;
}

export interface Author {
    id: number;
    author_name: string;
    publisher_id: number;

}

export interface AuthorProfile {
    id: number;
    author_id: number;
    bio: string;
}

export interface Book{
    id: number;
    title: string;
    slug: string;
    isbn: string;
    price: number;
    description: string;
    images: string;
    author_id: number;
    publisher_id: number;
}

export interface Genre {
    id: number;
    genre_name: string;
}

export interface Manager {
    id: number;
    manager_name: string;
    warehouse_id: number;
}

export interface Product{
    id: number;
    prod_name: string;
    price: number;
}

export interface Publisher {
    id: number;
    publisher_name: string;
}

export interface Review {
    id: number;
    stars: number;
    comment: string;
    reviewable_type: string;
    book_id: number;
    user_id: number;
}

export interface Supplier{
    id: number;
    supplier_name: string;
}

export interface User{
    id: number;
    name: string;
    email: string;
    password: string;
}

export interface Warehouse{
    id: number;
    location: string;
    supplier_id: number;
}
