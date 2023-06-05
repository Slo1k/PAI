import React, { useState } from "react";
import ToDoList from "./components/ToDoList";
import NewTask from "./components/NewTask";
import Filter from "./components/Filter";

function App() {
  const [tasks, setTasks] = useState([]);
  const [hideCompleted, setHideCompleted] = useState(false);
  const [lastTaskId, setLastTaskId] = useState(0);

  const handleToggle = (taskId) => {
    setTasks((prevTasks) =>
      prevTasks.map((task) =>
        task.id === taskId ? { ...task, completed: !task.completed } : task
      )
    );
  };

  const handleAddTask = (content) => {
    const newTask = {
      id: lastTaskId + 1,
      content,
      completed: false,
    };

    setTasks((prevTasks) => [...prevTasks, newTask]);
    setLastTaskId((prevId) => prevId + 1);
  };

  const handleToggleHideCompleted = () => {
    setHideCompleted((prevHideCompleted) => !prevHideCompleted);
  };

  const filteredTasks = hideCompleted
    ? tasks.filter((task) => !task.completed)
    : tasks;

  return (
    <div>
      <h1 style={styles.heading}>Welcome to my To Do list!</h1>
      <div style={styles.container}>
        <Filter
          hideCompleted={hideCompleted}
          onToggleHideCompleted={handleToggleHideCompleted}
        />
        <hr />
        <ToDoList tasks={filteredTasks} onToggle={handleToggle} />
        <hr />
        <NewTask onAddTask={handleAddTask} />
      </div>
    </div>
  );
}

const styles = {
  container: {
    maxWidth: "400px",
    margin: "0 auto",
    padding: "20px",
    border: "1px solid black",
  },
  heading: {
    textAlign: "center",
    marginBottom: "20px",
  },
};

export default App;
