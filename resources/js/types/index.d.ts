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

export interface ChangeLog {
    id: string;
    creator_id: number;
    creator: User;
    changeable: Record<string, string>;
    changeable_type: string;
    changeable_id: number;
    change: string;
    created_at: string;
}

interface ChangeLogsChange {
    old: string;
    new: string;
}

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

interface QuizAnswer {
    id: number;
    answer: string;
    is_correct: boolean;
}

interface GuestUser {
    id: number;
    name: string;
    last_name: string;
    email: string;
    total_score: number;
    total_number_of_unanswered_questions: number;
    time_taken_seconds: number;
}
