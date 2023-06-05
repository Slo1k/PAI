function Task({ id, content, completed, onToggle }) {
  return (
    <div style={styles.taskContainer}>
      <input
        type="checkbox"
        checked={completed}
        onChange={() => onToggle(id)}
        style={styles.checkbox}
      />
      <span style={{ ...styles.taskText, textDecoration: completed ? 'line-through' : 'none' }}>
        {content}
      </span>
    </div>
  );
}


const styles = {
  taskContainer: {
    display: 'flex',
    alignItems: 'center',
    marginBottom: '5px',
  },
  checkbox: {
    marginRight: '5px',
  },
  taskText: {
    fontSize: '16px',
  },
}

export default Task;
