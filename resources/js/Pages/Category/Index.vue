<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card/Card.vue";
import Table from "@/Components/Table/Table.vue";
import Td from "@/Components/Table/Td.vue";
import Button from "@/Components/Button.vue";
import AddNew from "@/Components/AddNew.vue";

const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  items: {
    type: Object,
    default: () => ({}),
  },
  headers: {
    type: Array,
    default: () => [],
  },
  can: Object,
});

console.log(props);
</script>

<template>
  <Head :title="title" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ title }}
      </h2>
    </template>
    <Container>
      <AddNew class="my-4">
        <Button v-if="can.create" :href="`permissions/create`">Adicionar</Button>

        <template #filters>
          <Input type="text" class="mt-1 block w-full" />
        </template>
      </AddNew>
      <Card class="mt-4" :is-loading="isLoading" no-padding>
        <Table :headers="headers" :items="items">
          <template v-slot="{ item }">
            <Td>
              {{ item.name }}
            </Td>
            <Td>
              {{ item.created_at_formatted }}
            </Td>
            <Td>

            </Td>
          </template>
        </Table>
      </Card>
    </Container>
  </BreezeAuthenticatedLayout>
</template>
