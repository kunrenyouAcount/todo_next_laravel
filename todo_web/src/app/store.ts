import { configureStore } from "@reduxjs/toolkit";
import todosModule from "../modules/TodosModule";

const store = configureStore({
  reducer: {
    todos: todosModule.reducer,
  },
});

export type RootState = ReturnType<typeof store.getState>;
export type AppDispatch = typeof store.dispatch;

export default store;
