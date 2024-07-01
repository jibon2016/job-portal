<script setup>
import BackendLayout from '@/Layouts/BackendLayout.vue';

import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import Editor from '@tinymce/tinymce-vue'

const props = defineProps({
        job: {
            type: Object,
            required: true,
        },
    })

const form = useForm({
    job_title: props.job.job_title,
    company_name: props.job.company_name,
    vacancy: props.job.vacancy,
    deadline: props.job.deadline,
    summary: props.job.summary,
    description: props.job.description,
    requirement: props.job.requirement,
    location: props.job.location,
    experience: props.job.experience,
    employment_type: props.job.employment_type,
    industry_type: props.job.industry_type,
    salary: props.job.salary,
    featured: props.job.featured,
    company_image: null,
    website: props.job.website,
});


const submit = () => {
    form.post(route('jobs.update', {"id": props.job.id}), {
        onFinish: () => form.reset('featured'),
    });
};
</script>

<template>
    <Head title="Create Job" />

    <BackendLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Update Job</h2>
                <Link class="bg-kore text-gray-100 py-2 px-3 rounded-md" :href="route('jobs.all')">Back</Link>
            </div>
        </template>

        {{ form.errors }}

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit" enctype="multipart/form-data" class="p-10 max-w-3xl m-auto">
                        <h4 class="text-center text-xl text-bg-kore text-gray-500 font-semibold">Update Job</h4>



                        <div>
                            <InputLabel for="job_title"> Job Title <span class="text-red-700">*</span></InputLabel>

                            <TextInput
                                id="job_title"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.job_title"
                                required
                                autofocus
                                autocomplete="job_title"
                            />

                            <InputError class="mt-2" :message="form.errors.job_title" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="company_name"> Company Name <span class="text-red-700">*</span></InputLabel>

                            <TextInput
                                id="company_name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.company_name"
                                required
                                autofocus
                                autocomplete="company_name"
                            />

                            <InputError class="mt-2" :message="form.errors.company_name" />
                        </div>

                        <div class="mt-4 flex">
                            <div class="w-full md:basis-1/2 pr-3">
                                <InputLabel for="vacancy"> Vacancy <span class="text-red-700">*</span></InputLabel>
                                <TextInput
                                    id="vacancy"
                                    type="number"
                                    class="mt-1 block w-full"
                                    v-model="form.vacancy"
                                    required
                                    autofocus
                                    autocomplete="vacancy"
                                />
                                <InputError class="mt-2" :message="form.errors.vacancy" />
                            </div>

                            <div class="w-full md:basis-1/2">
                                <InputLabel for="deadline"> Deadline <span class="text-red-700">*</span></InputLabel>
                                <TextInput
                                    id="deadline"
                                    type="date"
                                    class="mt-1 block w-full"
                                    v-model="form.deadline"
                                    required
                                    autofocus
                                    autocomplete="deadline"
                                />
                                <InputError class="mt-2" :message="form.errors.deadline" />
                            </div>

                        </div>

                        <div class="mt-4">
                            <InputLabel for="summary"> Job Summary <span class="text-red-700">*</span></InputLabel>

                            <Editor
                                v-model="form.summary"
                                api-key="jviex6363p10xf5yk8oebd0sdsg89oin7k3dxl8fvsagl23b"
                                :init="{plugins: 'lists link image table code help wordcount',height: 200}"
                            />
                            <InputError class="mt-2" :message="form.errors.summary" />
                        </div>


                        <div class="mt-4">
                            <InputLabel for="description"> Job Description <span class="text-red-700">*</span></InputLabel>

                            <Editor
                                v-model="form.description"
                                api-key="jviex6363p10xf5yk8oebd0sdsg89oin7k3dxl8fvsagl23b"
                                :init="{plugins: 'lists link image table code help wordcount',height: 200}"
                            />
                            <InputError class="mt-2" :message="form.errors.description" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="requirement"> Job Requirement <span class="text-red-700">*</span></InputLabel>
                            <Editor
                                v-model="form.requirement"
                                api-key="jviex6363p10xf5yk8oebd0sdsg89oin7k3dxl8fvsagl23b"
                                :init="{plugins: 'lists link image table code help wordcount',height: 200}"
                            />
                            <InputError class="mt-2" :message="form.errors.requirement" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="location"> Location <span class="text-red-700">*</span></InputLabel>

                            <TextInput
                                id="location"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.location"
                                required
                                autofocus
                                autocomplete="location"
                            />

                            <InputError class="mt-2" :message="form.errors.location" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="experience"> Experience <span class="text-red-700">*</span></InputLabel>

                            <TextInput
                                id="experience"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.experience"
                                required
                                autofocus
                                autocomplete="experience"
                            />

                            <InputError class="mt-2" :message="form.errors.experience" />
                        </div>

                        <div class="mt-4">
                            <label for="employment_type" class="text-sm"> Employment Type <span class="text-red-700">*</span></label>

                            <select
                                class="mt-1 block w-full rounded border-gray-500"
                                v-model="form.employment_type"
                            >
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                            </select>

                            <InputError class="mt-2" :message="form.errors.employment_type" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="industry_type"> Industry Type</InputLabel>

                            <TextInput
                                id="industry_type"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.industry_type"
                                autofocus
                                autocomplete="industry_type"
                            />
                            <InputError class="mt-2" :message="form.errors.industry_type" />
                        </div>

                        <div class="mt-4 flex">
                            <div class="w-full md:basis-1/2 pr-3">
                                <InputLabel for="salary"> Salary <span class="text-red-700">*</span></InputLabel>
                                <TextInput
                                    id="salary"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.salary"
                                    required
                                    autofocus
                                    autocomplete="salary"
                                />
                                <InputError class="mt-2" :message="form.errors.salary" />
                            </div>

                            <div class="w-full md:basis-1/2 mt-2  text-center">
                                <InputLabel for="featured"> Featured <span class="text-red-700">*</span></InputLabel>
                                    <TextInput
                                        id="featured"
                                        type="checkbox"
                                        class="mt-1 block m-auto"
                                        v-model="form.featured"
                                        autofocus
                                        autocomplete="featured"
                                    />
                                    <InputError class="mt-2" :message="form.errors.featured" />
                            </div>

                        </div>

                        <div class="mt-4">
                            <InputLabel for="company_image"> Company Image <span class="text-red-700">*</span></InputLabel>

                            <TextInput
                                id="company_image"
                                type="file"
                                class="mt-1 block w-full"
                                v-model="form.company_image"
                                autofocus
                                autocomplete="company_image"
                                @input="form.company_image = $event.target.files[0]"
                            />
                            <InputError class="mt-2" :message="form.errors.company_image" />
                        </div>

                        <div class="mt-4">
                            <InputLabel for="website"> Website Url <span class="text-red-700">*</span></InputLabel>

                            <TextInput
                                id="website"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.website"
                                required
                                autocomplete="website"
                                placeholder="https://example.com"
                            />

                            <InputError class="mt-2" :message="form.errors.website" />
                        </div>

                        <PrimaryButton class="ms-4 mt-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Save
                        </PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </BackendLayout>
</template>
