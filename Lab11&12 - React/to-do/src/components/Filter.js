function Filter({ hideCompleted, onToggleHideCompleted }) {
    return (
      <div style={styles.filterContainer}>
        <label style={styles.filterLabel}>
          <input
            type="checkbox"
            checked={hideCompleted}
            onChange={onToggleHideCompleted}
          />
          <span style={styles.filterText}>Hide Completed Tasks</span>
        </label>
      </div>
    );
  }

  const styles = {
    filterContainer: {
      marginBottom: '10px',
    },
    filterLabel: {
      display: 'flex',
      alignItems: 'center',
    },
    filterText: {
      marginLeft: '5px',
    }
  }

  export default Filter;