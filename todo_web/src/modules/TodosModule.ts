import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import { Todo } from "../models/Todo";

const initialState: Todo[] = [];

const todosModule = createSlice({
  name: "todos",
  initialState,
  reducers: {
    initialTodos(todos, action: PayloadAction<Todo[]>) {
      action.payload.map((todo) => {
        todos.push(todo);
      });
      // todos = action.payload;
    },
    addTodos(todos, action: PayloadAction<Todo>) {
      todos.push(action.payload);
    },
  },
});

export const { initialTodos, addTodos } = todosModule.actions;

export default todosModule;
