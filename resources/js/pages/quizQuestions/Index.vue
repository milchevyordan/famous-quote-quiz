<script setup lang="ts">
import { Head, InertiaForm, useForm } from '@inertiajs/vue3';
import {ref} from "vue";

import ResetSaveButtons from "@/components/HTML/ResetSaveButtons.vue";
import Modal from "@/components/Modal.vue";
import Table from "@/DataTable/Table.vue";
import { DataTable } from "@/DataTable/types";
import IconPencilSquare from "@/icons/PencilSquare.vue";
import IconTrash from "@/icons/Trash.vue";
import { type BreadcrumbItem, QuizAnswer, QuizQuestion, QuizQuestionForm } from '@/types';
import {dateTimeToLocaleString} from "@/utils";
import AppLayout from "@/layouts/AppLayout.vue";
import InputLabel from "@/components/InputLabel.vue";
import TextInput from "@/components/TextInput.vue";
import InputError from "@/components/InputError.vue";
import RadioButtonToggle from '@/DataTable/Components/RadioButtonToggle.vue';

defineProps<{
    dataTable: DataTable<QuizQuestion>;
}>();

const modelDefaults: QuizQuestionForm = {
    id: null!,
    question: null!,
    is_binary: true,
    binary_correct_answer: null!,
    answers: {
        1: { answer: null, is_correct: false },
        2: { answer: null, is_correct: false },
        3: { answer: null, is_correct: false },
    },
};

const checkOnlyOneCorrectAnswer = (form: InertiaForm<QuizQuestionForm>, correctIndex: number) => {
    Object.entries(form.answers).forEach(([index, answer]) => {
        (answer as QuizAnswer).is_correct = Number(index) === correctIndex;
    });
};

const showCreateModal = ref(false);
const showUpdateModal = ref(false);
const showDeleteModal = ref(false);

const openCreateModal = () => {
    showCreateModal.value = true;
};

const closeCreateModal = () => {
    showCreateModal.value = false;
    storeForm.reset();
};

const closeUpdateModal = () => {
    showUpdateModal.value = false;
    updateForm.reset();
};

const closeDeleteModal = () => {
    showDeleteModal.value = false;
    deleteForm.reset();
};

const showDeleteForm = (id: number) => {
    showDeleteModal.value = true;
    deleteForm.id = id;
};

const showEditForm = (item: QuizQuestionForm) => {
    updateForm.id = item.id;
    updateForm.question = item.question;
    updateForm.is_binary = item.is_binary;
    updateForm.binary_correct_answer = item.binary_correct_answer;

    if (!item.is_binary){
        item.answers.forEach((answer, index) => {
            updateForm.answers[index + 1] = {
                answer: answer.answer,
                is_correct: Boolean(answer.is_correct),
            };
        });
    }

    showUpdateModal.value = true;
};

const storeForm = useForm<QuizQuestionForm>(modelDefaults);
const updateForm = useForm<QuizQuestionForm>(modelDefaults);
const deleteForm = useForm<QuizQuestionForm>(modelDefaults);

const store = () => {
    storeForm.post(route("quiz.question.store"), {
        preserveScroll: true,
    });
    closeCreateModal();
};

const update = () => {
    updateForm.put(route("quiz.question.update", updateForm.id as number), {
        preserveScroll: true,
        onSuccess: () => {
            closeUpdateModal();
            updateForm.reset();
        },
        onError: () => {},
    });
};

const handleDelete = () => {
    deleteForm.delete(route("quiz.question.destroy", deleteForm.id as number), {
        preserveScroll: true,
    });
    closeDeleteModal();
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Quiz Questions',
        href: 'quiz.question',
    },
];
</script>

<template>
    <Head :title="'Quiz Questions'" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"
                >
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <Table
                            :data-table="dataTable"
                            :per-page-options="[5, 10, 15, 20, 50]"
                            :global-search="true"
                            :advanced-filters="false"
                        >
                            <template #additionalContent>
                                <div class="w-full flex gap-2">
                                    <button
                                        class="w-full md:w-auto border border-gray-300 dark:border-gray-700 rounded-md px-5 py-1.5 active:scale-95 transition hover:bg-gray-50 dark:hover:bg-gray-800"
                                        @click="openCreateModal"
                                    >
                                        Create Quiz Question
                                    </button>
                                </div>
                            </template>

                            <template #cell(created_at)="{ value, item }">
                                {{ dateTimeToLocaleString(value) }}
                            </template>

                            <template #cell(action)="{ value, item }">
                                <div class="flex gap-1.5">
                                    <button
                                        class="border border-gray-300 dark:border-gray-700 rounded-md p-1 active:scale-90 transition"
                                        :title="'Edit question'"
                                        @click="showEditForm(item)"
                                    >
                                        <IconPencilSquare
                                            classes="w-4 h-4 "
                                        />
                                    </button>

                                    <button
                                        :title="'Delete'"
                                        class="border border-gray-300 dark:border-gray-700 rounded-md p-1 active:scale-90 transition"
                                        @click="showDeleteForm(item.id)"
                                    >
                                        <IconTrash classes="w-4 h-4 " />
                                    </button>
                                </div>
                            </template>
                        </Table>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>

    <Modal
        :show="showCreateModal"
        max-width="lg"
        @close="closeCreateModal"
    >
        <div
            class="border-b border-gray-100 dark:border-gray-700 px-3.5 p-3 text-xl font-medium"
        >
            <div>Create Quiz Question</div>
        </div>

        <form
            class="p-6"
            @submit.prevent="store"
        >
            <div>
                <InputLabel
                    for="question"
                    :value="`Question`"
                />

                <TextInput
                    id="question"
                    v-model="storeForm.question"
                    type="text"
                    :placeholder="'Question'"
                    class="mt-1 block w-full mb-3.5"
                    required
                />

                <InputError
                    class="mt-2"
                    :message="storeForm.errors.question"
                />
            </div>

            <div>
                <InputLabel
                    for="is_binary"
                    value="Is Binary"
                />

                <RadioButtonToggle
                    v-model="storeForm.is_binary"
                    name="is_binary"
                    class="mt-1 mb-3.5"
                />

                <InputError
                    class="mt-2"
                    :message="storeForm.errors.is_binary"
                />
            </div>

            <div v-if="storeForm.is_binary">
                <InputLabel
                    for="binary_correct_answer"
                    value="Binary Correct Answer"
                />

                <RadioButtonToggle
                    v-model="storeForm.binary_correct_answer"
                    name="binary_correct_answer"
                    class="mt-1 mb-3.5"
                    required
                />

                <InputError
                    class="mt-2"
                    :message="storeForm.errors.binary_correct_answer"
                />
            </div>

            <div
                v-else
                v-for="number in [1, 2, 3]"
                :key="number"
                class="flex gap-2"
            >
                <div>
                    <InputLabel
                        :for="'answers_' + number + '_answer'"
                        :value="`Answer ${number}`"
                    />

                    <TextInput
                        :id="'answers_' + number + '_answer'"
                        v-model="storeForm.answers[number].answer"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        class="mt-2"
                        :message="storeForm.errors['answers.' + number + '.answer']"
                    />
                </div>

                <div>
                    <InputLabel
                        :for="'answers_' + number + '_is_correct'"
                        :value="`Correct`"
                    />

                    <RadioButtonToggle
                        v-model="storeForm.answers[number].is_correct"
                        :name="'answers_' + number + '_is_correct'"
                        class="mt-1 mb-3.5"
                        @change="checkOnlyOneCorrectAnswer(storeForm, number)"
                    />

                    <InputError
                        class="mt-2"
                        :message="storeForm.errors['answers.' + number + '.is_correct']"
                    />
                </div>
            </div>

            <div class="col-span-2 flex justify-end gap-3 my-2 pt-1 px-4">
                <ResetSaveButtons
                    :processing="storeForm.processing"
                    :recently-successful="storeForm.recentlySuccessful"
                    @reset="storeForm.reset()"
                />
            </div>
        </form>
    </Modal>

    <Modal
        :show="showUpdateModal"
        max-width="lg"
        @close="closeUpdateModal"
    >
        <div
            class="border-b border-gray-100 dark:border-gray-700 px-3.5 p-3 text-xl font-medium"
        >
            <div>Create Quiz Question</div>
        </div>

        <form
            class="p-6"
            @submit.prevent="update"
        >
            <div>
                <InputLabel
                    for="question"
                    :value="`Question`"
                />

                <TextInput
                    id="question"
                    v-model="updateForm.question"
                    type="text"
                    :placeholder="'Question'"
                    class="mt-1 block w-full mb-3.5"
                    required
                />

                <InputError
                    class="mt-2"
                    :message="updateForm.errors.question"
                />
            </div>

            <div>
                <InputLabel
                    for="is_binary"
                    value="Is Binary"
                />

                <RadioButtonToggle
                    v-model="updateForm.is_binary"
                    name="is_binary"
                    class="mt-1 mb-3.5"
                />

                <InputError
                    class="mt-2"
                    :message="updateForm.errors.is_binary"
                />
            </div>

            <div v-if="updateForm.is_binary">
                <InputLabel
                    for="binary_correct_answer"
                    value="Binary Correct Answer"
                />

                <RadioButtonToggle
                    v-model="updateForm.binary_correct_answer"
                    name="binary_correct_answer"
                    class="mt-1 mb-3.5"
                    required
                />

                <InputError
                    class="mt-2"
                    :message="updateForm.errors.binary_correct_answer"
                />
            </div>

            <div
                v-else
                v-for="number in [1, 2, 3]"
                :key="number"
                class="flex gap-2"
            >
                <div>
                    <InputLabel
                        :for="'answers_' + number + '_answer'"
                        :value="`Answer ${number}`"
                    />

                    <TextInput
                        :id="'answers_' + number + '_answer'"
                        v-model="updateForm.answers[number].answer"
                        type="text"
                        class="mt-1 block w-full"
                    />

                    <InputError
                        class="mt-2"
                        :message="updateForm.errors['answers.' + number + '.answer']"
                    />
                </div>

                <div>
                    <InputLabel
                        :for="'answers_' + number + '_is_correct'"
                        :value="`Correct`"
                    />

                    <RadioButtonToggle
                        v-model="updateForm.answers[number].is_correct"
                        :name="'answers_' + number + '_is_correct'"
                        class="mt-1 mb-3.5"
                        @change="checkOnlyOneCorrectAnswer(updateForm, number)"
                    />

                    <InputError
                        class="mt-2"
                        :message="updateForm.errors['answers.' + number + '.is_correct']"
                    />
                </div>
            </div>

            <div class="col-span-2 flex justify-end gap-3 my-2 pt-1 px-4">
                <ResetSaveButtons
                    :processing="updateForm.processing"
                    :recently-successful="updateForm.recentlySuccessful"
                    @reset="updateForm.reset()"
                />
            </div>
        </form>
    </Modal>

    <Modal
        :show="showDeleteModal"
        @close="closeDeleteModal"
    >
        <div
            class="border-b border-gray-100 dark:border-gray-700 px-3.5 p-3 text-xl font-medium"
        >
            Delete Question <span class="font-bold">#{{ deleteForm?.id }}</span> ?
        </div>

        <form
            class="col-span-2 flex justify-end gap-3 my-2 pt-1 px-4"
            @submit.prevent="handleDelete"
        >
            <ResetSaveButtons
                :processing="deleteForm.processing"
                :recently-successful="deleteForm.recentlySuccessful"
                :is-delete="true"
                @reset="closeDeleteModal"
            />
        </form>
    </Modal>
</template>
