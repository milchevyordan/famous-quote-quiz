<script setup lang="ts">
import { Head, Link, useForm, router } from '@inertiajs/vue3';
import InputError from '@/components/InputError.vue';
import InputLabel from '@/components/InputLabel.vue';
import TextInput from '@/components/TextInput.vue';
import RadioButtonToggle from '@/DataTable/Components/RadioButtonToggle.vue';
import PrimaryButton from '@/components/PrimaryButton.vue';
import { ref } from 'vue';
import { QuizQuestion } from '@/types';

const props = defineProps<{
    questions?: QuizQuestion[];
}>();

const form = useForm<{
    is_binary: boolean;
    name: string;
    last_name: string;
    email: string;
}>({
    is_binary: true,
    name: null!,
    last_name: null!,
    email: null!,
});

const quizStarted = ref<boolean>(false);

const startQuiz = async () => {
    if(!props.questions){
        await new Promise((resolve, reject) => {
            router.reload({
                data: { is_binary: form.is_binary },
                only: ['questions'],
                onSuccess: resolve,
                onError: reject,
            });
        });
    }

    quizStarted.value = true;
};
</script>

<template>
    <Head title="Welcome" />
    <div class="flex min-h-screen flex-col items-center bg-[#FDFDFC] p-6 text-[#1b1b18] lg:justify-center lg:p-8 dark:bg-[#0a0a0a]">
        <header class="not-has-[nav]:hidden mb-6 w-full max-w-[335px] text-sm lg:max-w-4xl">
            <nav class="flex items-center justify-end gap-4">
                <Link
                    v-if="$page.props.auth.user"
                    :href="route('dashboard')"
                    class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                >
                    Dashboard
                </Link>
                <template v-else>
                    <Link
                        :href="route('login')"
                        class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                    >
                        Log in
                    </Link>
                    <Link
                        :href="route('register')"
                        class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
                    >
                        Register
                    </Link>
                </template>
            </nav>
        </header>
        <div class="duration-750 starting:opacity-0 flex w-full items-center justify-center opacity-100 transition-opacity lg:grow">
            <div class="flex w-full max-w-[335px] flex-col-reverse overflow-hidden rounded-lg lg:max-w-4xl lg:flex-row">
                <form
                    v-show="!quizStarted"
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:rounded-br-none lg:rounded-tl-lg lg:p-20 dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
                    @submit.prevent="startQuiz"
                >
                    <div>
                        <InputLabel for="is_binary" value="Type of quiz" />

                        <RadioButtonToggle
                            v-model="form.is_binary"
                            name="is_binary"
                            left-button-label="Binary (Yes/No)"
                            right-button-label="Multiple choice"
                            class="mb-3.5 mt-1"
                        />

                        <InputError class="mt-2" :message="form.errors.is_binary" />
                    </div>

                    <div>
                        <InputLabel for="name" :value="`Name`" />

                        <TextInput id="name" v-model="form.name" type="text" :placeholder="'Name'" class="mb-3.5 mt-1 block w-full" />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>

                    <div>
                        <InputLabel for="last_name" :value="`Last Name`" />

                        <TextInput
                            id="last_name"
                            v-model="form.last_name"
                            type="text"
                            :placeholder="'Last Name'"
                            class="mb-3.5 mt-1 block w-full"
                        />

                        <InputError class="mt-2" :message="form.errors.last_name" />
                    </div>

                    <div>
                        <InputLabel for="email" :value="`Email`" />

                        <TextInput id="email" v-model="form.email" type="email" :placeholder="'Email'" class="mb-3.5 mt-1 block w-full" />

                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="pt-1">
                        <PrimaryButton>Start Quiz</PrimaryButton>
                    </div>
                </form>

                <div v-show="quizStarted"
                    class="flex-1 rounded-bl-lg rounded-br-lg bg-white p-6 pb-12 text-[13px] leading-[20px] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] lg:rounded-br-none lg:rounded-tl-lg lg:p-20 dark:bg-[#161615] dark:text-[#EDEDEC] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"
                >
                    <h2 class="mb-4 text-lg font-bold">Quiz Questions</h2>
                    <div
                        v-for="(question, i) in questions"
                        :key="question.id"
                        class="mb-6 rounded-lg border border-gray-300 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-[#1a1a1a]"
                    >
                        <p class="mb-4 text-base font-medium text-gray-900 dark:text-gray-100">
                            {{ i + 1 }}. {{ question.question }}
                        </p>

                        <!-- Binary question -->
                        <div v-if="question.is_binary" class="space-y-2">
                            <label
                                class="flex items-center gap-3 rounded-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-100 dark:border-gray-600 dark:bg-[#2a2a2a] dark:text-gray-200 dark:hover:bg-[#333]"
                            >
                                <input
                                    type="radio"
                                    class="h-4 w-4 accent-indigo-600"
                                    :name="`q${question.id}`"
                                    value="1"
                                />
                                Yes
                            </label>

                            <label
                                class="flex items-center gap-3 rounded-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-100 dark:border-gray-600 dark:bg-[#2a2a2a] dark:text-gray-200 dark:hover:bg-[#333]"
                            >
                                <input
                                    type="radio"
                                    class="h-4 w-4 accent-indigo-600"
                                    :name="`q${question.id}`"
                                    value="0"
                                />
                                No
                            </label>
                        </div>

                        <!-- Multiple choice -->
                        <div v-else class="space-y-2">
                            <label
                                v-for="(answer, key) in question.answers"
                                :key="key"
                                class="flex items-center gap-3 rounded-md border border-gray-300 bg-gray-50 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-100 dark:border-gray-600 dark:bg-[#2a2a2a] dark:text-gray-200 dark:hover:bg-[#333]"
                            >
                                <input
                                    type="radio"
                                    class="h-4 w-4 accent-indigo-600"
                                    :name="`q${question.id}`"
                                    :value="key"
                                />
                                {{ answer.answer }}
                            </label>
                        </div>
                    </div>
                    <PrimaryButton>Submit Answers</PrimaryButton>
                </div>
            </div>
        </div>
        <div class="h-14.5 hidden lg:block"></div>
    </div>
</template>
