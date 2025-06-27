import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    time_for_quiz_in_minutes: number;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export type BreadcrumbItemType = BreadcrumbItem;

export type FormMethod = {
    _method?: string;
};

export type Form = {
    [key: string]: any;
};

export interface DeleteForm {
    id: number;
    name: string;
    amount?: number;
    created_at?: Date;
}

export interface QuizQuestion {
    id: number;
    question: string;
    is_binary: boolean;
    binary_correct_answer: boolean;
    answers?: QuizAnswer[];
}

export interface QuizQuestionForm extends Form, FormMethod {

}

export interface QuizAnswer {
    id: number;
    answer: string;
    is_correct: boolean;
}

export interface GuestUser {
    id: number;
    name: string;
    last_name: string;
    email: string;
    attempts?: Attempt[];
}

export interface Attempt {
    id: number;
    guest_user_id: number;
    total_score: number;
    total_number_of_unanswered_questions: number;
    time_taken_seconds: number;
    guest_user?: GuestUser;
    created_at?: Date;
}
