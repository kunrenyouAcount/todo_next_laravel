import { createSlice, PayloadAction } from "@reduxjs/toolkit";
import { Todo } from "../models/Todo";

type State = {
  increment: number;
  todos: Todo[];
};

const initialState: State = {
  increment: 2,
  todos: [
    {
      id: 2,
      title: "タイトル２",
      description: "詳細２",
    },
    {
      id: 1,
      title: "タイトル１",
      description: "詳細１",
    },
  ],
};

const todosModule = createSlice({
  name: "todos",
  initialState,
  reducers: {
    addTodo(state: State, action: PayloadAction<Todo>) {
      state.increment++;

      const newTodo: Todo = {
        id: state.increment,
        title: action.payload.title,
        description: action.payload.description,
      };

      state.todos = [newTodo, ...state.todos];
    },
    deleteTodo(state: State, action: PayloadAction<number>) {
      state.todos = state.todos.filter((t) => t.id !== action.payload);
    },
  },
});

export const { addTodo, deleteTodo } = todosModule.actions;

export default todosModule;
