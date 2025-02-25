<template>
    <Dialog
        :visible="isVisible"
        modal
        header="Eliminar doctor"
        :style="{ width: '40vw' }"
        :breakpoints="{ '960px': '75vw', '640px': '100vw' }"
        @update:visible="closeModal"
    >
    <div class="flex justify-end gap-4">
        <Button 
            label="Eliminar"
            severity="danger"
            @click="emitIdDoctorDelete(idDoctor)"
        />
        <Button
                    label="Cancelar"
                    class="p-button-secondary"
                    @click="closeModal"
                />
            </div>
    </Dialog>
</template>
<script setup lang="ts">
import { Button, Dialog } from "primevue";

const { isVisible, idDoctor } = defineProps<{
    isVisible: boolean;
    idDoctor: number;
}>();

const emit = defineEmits<{
    (e: "emitCloseModal", state: boolean): void;
    (e: "emitSuccessDelete", idDoctor: number): void;
}>();

const emitIdDoctorDelete = (idDoctor: number) => {
    emit("emitSuccessDelete", idDoctor);
};

const closeModal = () => {
    emit("emitCloseModal", false);
};
</script>
<style scoped lang="css"></style>
