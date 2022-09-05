<script setup>
import { onMounted, ref, watch } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card/Card.vue";
import Table from "@/Components/Table/Table.vue";
import Td from "@/Components/Table/Td.vue";
import Actions from "@/Components/Table/Actions.vue";
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
  filters: {
    type: Object,
    default: () => ({}),
  },
  can: Object,
});
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
        <Button v-if="can.create" :href="`roles/create`">Add New</Button>
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
              <Actions
                :edit-link="route(`roles.edit`, { id: item.id })"
                :show-edit="item.can.edit"
                :show-delete="item.can.delete"
              />
            </Td>
          </template>
        </Table>
      </Card>
    </Container>
  </BreezeAuthenticatedLayout>
</template>
