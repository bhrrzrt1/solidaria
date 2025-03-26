<template>
    <Dialog
        :visible="isVisible"
        modal
        :header="'Asignar permisos'"
        :style="{ width: '40vw' }"
        :breakpoints="{ '960px': '75vw', '640px': '100vw' }"
        @update:visible="closeModal"
    >
        <p>hola</p>
        <PickList v-model="permissions" data-key="id" breakpoint="1000px">
        </PickList>
    </Dialog>
</template>
<script setup lang="ts">
import axios from "axios";
import { Dialog, PickList } from "primevue";
import { onMounted, ref } from "vue";
import { Role } from "../Interfaces/Role";

interface Permission {
    id: number;
    name: string;
}
const { isVisible, role } = defineProps<{ isVisible: boolean; role: Role }>();
const emit = defineEmits<{
    (e: "emitCloseModal", state: boolean): void;
    (e: "emitAssignPermissions"): void;
}>();

// get permissions
const permissions = ref([]);

const getPermissions = async () => {
    try {
        const { data } = await axios.get("/modulo/permissions");
        permissions.value = data;
    } catch (e) {
        console.log(e);
    }
};

const closeModal = () => {
    emit("emitCloseModal", false);
};

onMounted(() => {
    getPermissions();
});
</script>
<style scoped lang="css"></style>
