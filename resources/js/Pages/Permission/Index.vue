<script setup>
import { Head } from "@inertiajs/inertia-vue3";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Container from "@/Components/Container.vue";
import Card from "@/Components/Card/Card.vue";
import Table from "@/Components/Table/Table.vue";
import Td from "@/Components/Table/Td.vue";
import Actions from "@/Components/Table/Actions.vue";
import Button from "@/Components/Button.vue";
import AddNew from "@/Components/AddNew.vue";
import Modal from "@/Components/Modal.vue";

import useDeleteItem from "@/Composables/useDeleteItem.js";

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

const {
  deleteModal,
  itemToDelete,
  isDeleting,
  showDeleteModal,
  handleDeleteItem,
} = useDeleteItem({
  routeResourceName:'permissions'
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
              <Actions
                :edit-link="route(`permissions.edit`, { id: item.id })"
                :show-edit="item.can.edit"
                :show-delete="item.can.delete"
                @deleteClicked="showDeleteModal(item)"
              />
            </Td>
          </template>
        </Table>
      </Card>
    </Container>
  </BreezeAuthenticatedLayout>
  <Modal v-model="deleteModal" :title="`Delete ${itemToDelete.name}`">
    Tem certeza de que deseja excluir este item?

    <template #footer>
      <Button @click="handleDeleteItem" :disabled="isDeleting">
        <span v-if="isDeleting">Excluindo</span>
        <span v-else>Deletar</span>
      </Button>
    </template>
  </Modal>
</template>
